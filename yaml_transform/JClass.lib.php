<?php

class JClass {

	private $definition;
	private $name;
	
	public function __construct($name, $def) {
		$this->name = $name;
		$this->definition = $def;
	}
	
	
	function getName() {
		return $this->name;
	}
	
	function getProperties() {
		$p = array();
		foreach($this->definition["columns"] as $name => $definition) {
			if(strpos($name, "_id") <= 0) {
				$p[] = new JProperty($name, $definition);
			}			
		}
		foreach($this->definition["relations"] as $rname => $rdefinition) {
			$srname = str_replace("_id", "", $rdefinition["foreign"]);
			$prop = new JProperty($srname, $rdefinition);
			if($rdefinition["type"] == "one") {
				$prop->setType($rname);
			} else {
				$prop->setType("List<".$rname.">");
			}
			$p[] = $prop;
		}
		return $p;
	}
	
	function __toString() {
		$s = "";
		$s .= sprintf("class %s {\n", $this->getName());
		foreach($this->getProperties() as $property) {
			$s .= sprintf("\t%s\n",$property);
		}
		$s .= sprintf("}", $this->getName());
		return $s;
	}
}

class JProperty {
	private $name;
	private $definition;
		
	public function __construct($name, $def) {
		$this->name = $name;
		$this->definition = $def;
	}
	
	function __toString() {
		$s = "";		
		$s .= sprintf("private %s %s;",
			$this->getType(),
			$this->getName()
		);
		return $s;
	}
	
	function getName() {		
		return $this->name;
	}
	
	function setType($type) {
		$this->definition["type"] = $type;
	}
	
	function getType() {
		$t = $this->definition["type"];
		if(strpos($t,"timestamp") === 0) return "Date";
		if(strpos($t,"date") === 0) return "Date";
		if(strpos($t,"bigint") === 0) return "int";
		if(strpos($t,"integer") === 0) return "int";
		if(strpos($t,"text") === 0) return "String";
		if(strpos($t,"string") === 0) return "String";
		if(strpos($t,"enum") === 0) return "String";
		return $t;
	}
}
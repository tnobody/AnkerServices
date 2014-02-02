#!/usr/bin/python
# -*- coding: utf-8 -*-

import unittest
from selenium import webdriver
from selenium.common.exceptions import TimeoutException
from selenium.webdriver.support.ui import WebDriverWait # available since 2.4.0
import time

def suite():
    tests = ['testSkillSearch']
    return unittest.TestSuite(map(SkillSearchTest, tests))


class SkillSearchTest(unittest.TestCase):

    def setUp(self):
        # Neue Instanz des Firefoxtreibers
        self.driver = webdriver.Firefox()
        self.driver.implicitly_wait(10)
        self.localDomain = r"http://ankerservices.localhost"

    def tearDown(self):
        pass

    def waitForCssElementPresent(self, locator):
        try:
            WebDriverWait(self.driver, 10).until(lambda driver : driver.find_element_by_css_selector(locator))    
            return True
        except:
            return False

    def login(self):
        """ Überprüfe Loginfunktionalität für Firmen """
        self.driver.find_element_by_id("signin_username").send_keys("firma")
        self.driver.find_element_by_id("signin_password").send_keys("test")
        self.driver.find_element_by_tag_name("form").submit()

    def searchFor(self, keywords):
        search_keywords = self.driver.find_element_by_id("token-input-search_keywords")
        search_keywords.send_keys(keywords)
        # Warte auf die Dropdownliste
        self.waitForCssElementPresent('div.token-input-dropdown-facebook ul li')
        # Triggere Suche in vorgeladenen Kompetenzen
        search_keywords.send_keys(" ")

    def checkNumberOfEntries(self, displayedEntries):
        """ Überprüfe die Anzahl der gefundenen Profile """
        # Warte auf Ajax Ergebnis
        self.waitForCssElementPresent("ul.kompetenzen_search_resultlist")

        # Es müssen displayedEntries Profile gefunden werden
        profiles = self.driver.find_elements_by_css_selector("ul.kompetenzen_search_resultlist li.profil_item")

        # Stimmt die Anzahl der gefundenen Profile
        self.assertEqual(len(profiles), displayedEntries, "Anzahl der gefunden Profile falsch")

    def checkEntries(self, dList):
        """ Überprüfe die Reihenfolge der gefundenen Profile """
        
        # Format für order: Liste aus 2er-Tupeln
        # [(profil_id, n-ter Eintrag in der Ergebnisliste, Anzahl der angezeigten Kompetenzen), ...]
        for profil_id, platz, numOfSkills in dList:
            nthchild = self.driver.find_element_by_css_selector("\
            ul.kompetenzen_search_resultlist \
            li.profil_item:nth-child(" + str(platz) + ") input")

            self.failUnlessEqual(nthchild.get_attribute("id"),
            "profil_item_remember_this_button_" + str(profil_id), 
            "Profil im Suchergebnis nicht an der richtigen Stelle")

            self.checkNumberOfSkills(profil_id, numOfSkills)

    def checkNumberOfSkills(self, profil_id, numberOfSkills):
        """ Überprüfe die Anzahl der angezeigten Kompetenzen """
        kompetenzen = self.driver.find_elements_by_css_selector("\
            #profil_item_" + str(profil_id) + \
            " div.profil_item_kompetenzen ul ul.niveaustufen li span")
        # Stimmt die Anzahl der angezeigten Kompetenzen
        self.assertEqual(len(kompetenzen), numberOfSkills, 
            "Anzahl der angezeigten Kompetenzen falsch")

    def checkResultList(self, desiredResultList):
        """ Überprüfe Form der Ergebnisliste """
        self.checkNumberOfEntries(len(desiredResultList))
        self.checkEntries(desiredResultList)

    def testSkillSearch(self):
        """ Überprüfe die gelieferten Suchergebnisse der Kompetenzsuche """

        self.driver.get(self.localDomain + "/frontend_company_dev.php/kompetenzen/search")

        self.login()

        # Zur Kompetenzsuche navigieren
        self.driver.find_element_by_link_text("SUCHE").click()

        # Warte auf das Nachladen der Suchbegriffe für das Suchfelds
        self.waitForCssElementPresent("ul.token-input-list-facebook")

        self.searchFor("word")      

        self.checkResultList([(1,1,20),(2,2,8),(3,3,14),(4,4,1),(5,5,1)])        

if __name__ == "__main__": 
    unittest.TextTestRunner(verbosity=2).run(suite())


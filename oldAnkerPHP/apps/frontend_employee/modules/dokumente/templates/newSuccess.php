<h2>Meine Dokumente</h2>

<?php
use_stylesheet('smoothness/jquery-ui-1.8.4.custom.css');
use_stylesheet('jquery.fileupload-ui.css');

use_javascript('jquery-1.6.4.min.js');
use_javascript('jquery-ui-1.8.4.custom.min.js');
use_javascript('jquery.tmpl.min.js');
use_javascript('jquery.iframe-transport.js');
use_javascript('jquery.fileupload.js');
use_javascript('jquery.fileupload-ui.js');
use_javascript('application.js');
?>

<div style="margin-bottom: 15px;">
    Erlaubte Dateitypen: pdf, jpg/jpeg, gif, png &nbsp;&nbsp;&nbsp; Maximale Dateigröße: 5 MB
</div>

<div id="fileupload">
    <form action="<?php echo url_for('dokumente_add') ?>" method="POST" enctype="multipart/form-data">
        <div class="fileupload-buttonbar">
            <label class="fileinput-button">
                <span>Hinzufügen</span>
                <input type="file" name="files[]" accept="application/pdf;image/jpg;image/jpeg;image/png" multiple>
            </label>
            <button type="submit" class="start">Hochladen</button>
            <button type="reset" class="cancel">Abbrechen</button>
            <button type="button" class="delete">Alle löschen</button>
        </div>
    </form>
    <div class="fileupload-content">
        <table class="files"></table>
        <div class="fileupload-progressbar"></div>
    </div>
</div>
<script id="template-upload" type="text/x-jquery-tmpl">
    <tr class="template-upload{{if error}} ui-state-error{{/if}}">
        <td class="preview"></td>

        <td class="title">
            <label>Titel (Pflichtfeld):</label><br/>
            <input name="title[]" required><br/>
            {{if name}}${name}{{else}}Untitled{{/if}}
        </td>

        <td class="size">${sizef}</td>
        
        {{if error}}

        <td class="error" colspan="2">Fehler:
            {{if error === 'maxFileSize'}}File is too big
            {{else error === 'minFileSize'}}File is too small
            {{else error === 'acceptFileTypes'}}Filetype not allowed
            {{else error === 'maxNumberOfFiles'}}Max number of files exceeded
            {{else}}${error}
            {{/if}}
        </td>

        {{else}}
        <td class="start"><button>Hochladen</button></td>
        {{/if}}
        
        <td></td>
        <td></td>
        <td class="cancel"><button>Abbrechen</button></td>
    </tr>
</script>
<script id="template-download" type="text/x-jquery-tmpl">
    <tr class="template-download{{if error}} ui-state-error{{/if}}" id="dokument_${id}" token="${token}">
        {{if error}}
        <td></td>
        <td class="error" colspan="5">Fehler:
            {{if error === 1}}File exceeds upload_max_filesize (php.ini directive)
            {{else error === 2}}File exceeds MAX_FILE_SIZE (HTML form directive)
            {{else error === 3}}File was only partially uploaded
            {{else error === 4}}No File was uploaded
            {{else error === 5}}Missing a temporary folder
            {{else error === 6}}Failed to write file to disk
            {{else error === 7}}File upload stopped by extension
            {{else error === 'maxFileSize'}}File is too big
            {{else error === 'minFileSize'}}File is too small
            {{else error === 'acceptFileTypes'}}Filetype not allowed
            {{else error === 'maxNumberOfFiles'}}Max number of files exceeded
            {{else error === 'uploadedBytes'}}Uploaded bytes exceed file size
            {{else error === 'emptyResult'}}Empty file upload result
            {{else}}${error}
            {{/if}}
        </td>
        {{else}}
        <td class="preview">
            {{if thumbnail_url}}
            <a href="${url}" target="_blank"><img src="${thumbnail_url}"></a>
            {{/if}}
        </td>
        <td class="title">{{if name}}${name}{{else}}Untitled{{/if}}</td>        
        <td class="size">
            ${sizef}
            <div class="ajax-loader" id="ajax-loader_${id}">
                <?php echo image_tag('ajax-loader.gif'); ?>
            </div>
        </td>
        <td class="edit"><button class="edit">Bearbeiten</button></td>
        <td class="save"><button class="save">Speichern</button></td>
        <td class="abort"><button class="abort">Abbrechen</button></td>
        {{/if}}
        
        <td class="delete">
            <button class="delete" data-type="${delete_type}" data-url="${delete_url}">Datei löschen</button>
        </td>
    </tr>
</script>
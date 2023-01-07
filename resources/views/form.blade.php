<!--h1 class="mt-3 mb-3"> Componente</h1-->
<div class="container-fluid">
  <div class="form-group row">

      <div class="col-12 mb-3">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" placeholder="titulo" name="titulo" id="titulo" value="{{isset($webcomponent[0]->titulo)?$webcomponent[0]->titulo:''}}">
      </div>

        <!--div class="col-sm-4 sr-only">
          <input type="hidden" class="form-control" placeholder="cod_html" name="cod_html" id="cod_htmlD" value="{{isset($webcomponent[0]->cod_html)?$webcomponent[0]->cod_html:''}}">
        </div>

        <div class="col-sm-4 sr-only">
          <input type="hidden" class="form-control" placeholder="cod_css" name="cod_css" id="cod_cssD" value="{{isset($webcomponent[0]->cod_css)?$webcomponent[0]->cod_css:''}}">
        </div>

        <div class="col-sm-4 sr-only">
          <input type="hidden" class="form-control" placeholder="cod_js" name="cod_js" id="cod_jsD" value="{{isset($webcomponent[0]->cod_js)?$webcomponent[0]->cod_js:''}}">
        </div-->
        <div class="col-md-4">
          <div class="form-group">
               <label for="cod_html">Código HTML</label>
               <textarea type="text" class="form-control" id="cod_html" rows="10" placeholder="cod_html"  name="cod_html" value="" required>{{isset($webcomponent[0]->cod_html)?$webcomponent[0]->cod_html:''}}</textarea><!--<span>{{isset($webcomponent->cod_html)?$webcomponent->cod_html:''}}</span-->
                 <script type="text/javascript">
                 var editor = CodeMirror.fromTextArea(document.getElementById("cod_html"), {
                   lineNumbers: true,
                   lineWrapping: true,
                   autoCloseTags:true,
                   theme:'darcula',
                   mode: "text/html"
                 });
                 var charWidth = editor.defaultCharWidth(), basePadding = 4;
                 editor.on("renderLine", function(cm, line, elt) {
                   var off = CodeMirror.countColumn(line.text, null, cm.getOption("tabSize")) * charWidth;
                   elt.style.textIndent = "-" + off + "px";
                   elt.style.paddingLeft = (basePadding + off) + "px";
                 });
                 editor.refresh();
                 </script>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
               <label for="cod_css">Código CSS</label>
               <textarea type="text" class="form-control" id="cod_css" rows="10" placeholder="cod_css"  name="cod_css" value="" required>{{isset($webcomponent[0]->cod_css)?$webcomponent[0]->cod_css:''}}</textarea>
               <script type="text/javascript">
               var editorCSS = CodeMirror.fromTextArea(document.getElementById("cod_css"), {
                 lineNumbers: true,
                 lineWrapping: true,
                 autoCloseTags:true,
                 theme:'duotone-dark',
                 mode: "text/css"
               });
               var charWidth = editorCSS.defaultCharWidth(), basePadding = 4;
               editorCSS.on("renderLine", function(cm, line, elt) {
                 var off = CodeMirror.countColumn(line.text, null, cm.getOption("tabSize")) * charWidth;
                 elt.style.textIndent = "-" + off + "px";
                 elt.style.paddingLeft = (basePadding + off) + "px";
               });
               editorCSS.refresh();
               </script>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
               <label for="cod_js">Código JS</label>
               <textarea type="text" class="form-control" id="cod_js" rows="10" placeholder="cod_js"  name="cod_js">{{isset($webcomponent[0]->cod_js)?$webcomponent[0]->cod_js:''}}</textarea>
               <script type="text/javascript">
               var editorJS = CodeMirror.fromTextArea(document.getElementById("cod_js"), {
                 lineNumbers: true,
                 lineWrapping: true,
                 autoCloseTags:true,
                 theme:'material',
                 mode: "text/javascript"
               });
               var charWidth = editorJS.defaultCharWidth(), basePadding = 4;
               editorJS.on("renderLine", function(cm, line, elt) {
                 var off = CodeMirror.countColumn(line.text, null, cm.getOption("tabSize")) * charWidth;
                 elt.style.textIndent = "-" + off + "px";
                 elt.style.paddingLeft = (basePadding + off) + "px";
               });
               editorJS.refresh();
               </script>
          </div>
        </div>

        <div class="col-12 mb-3 sr-only">
          <input type="text" class="form-control" placeholder="" name="user_id" id="user_id" value="{{isset($user_id)?$user_id:auth()->id()}}">
        </div>

    </div>
    <div class="row mt-3 mb-3">
      <div class="col">
        <button type="submit" class="btn btn-primary" value="">{{$mode}}</button>
      </div>
      <div class="float-right mr-3">
        <a href="{{url('webcomponent')}}" class="btn btn-primary" role="button">Regresar</a>
      </div>
    </div>

  </div><!--<span>row</span-->
</div><!--<span>container</span-->

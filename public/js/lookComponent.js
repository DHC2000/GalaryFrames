$(document).ready(function(){

var txt1 = document.getElementById('cod_html').value;
var style = document.getElementById('cod_css').value;

var componente = $(txt1);

$(".XD").append(txt1);


  var styles = '<style>'+style+' </style>';
  var componentStyles = $(styles);

  $(".afterstyles").append(componentStyles);
//  document.querySelector('head').innerHTML= styles;

});

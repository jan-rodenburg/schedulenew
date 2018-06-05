// mei 2018, jaro 
// javascript funkties
// addition to functions.js

// Voor persistant searchfield bij schermovergang , jaro1803
// input#id_searchs - the id of the input textfield
// var $elm = input#id_searchs;
function storeSearchS($elm) {
   window.sessionStorage.setItem('ssearch',$elm.value);
}
function loadSearchS($elm) {
   var searchs = window.sessionStorage.getItem('ssearch');
   if (searchs) {
     $elm.val(searchs);
     execSearchS(searchs);
   }
}
function execSearchS(val) {
   // functie heb je al ergens
   // bij open de page de val in het form field schrijven
}
/*pike1803
en die dan aan de html knopen:
-------
$(document).ready(function() {
   var $elm = $('#id_searchs');
   loadSearchS($elm);
   $elm.on('keydown.searchs',function() {
     storeSearchS($elm);
   });
});
*/

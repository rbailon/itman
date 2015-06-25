/*!
 * Libreria JavaSript itman v1
 * PATRON WEB (Gdiat) 
 *
 * Ricardo Bailón
 *
 * Date: Wed Aug 31 10:35:15 2011 -0400
 */
(function( window, undefined ) {
   
   var itman = (function(){
 
      var core = {
          c_mod:'',c_sec:''

         //#############################################################################
         ,inChorizo: function(ch)
         {// Separa
            var ch;
            this.c_mod = ch.substr(5,3);
            this.c_sec = ch.substr(8,3);
         }
 
         //#############################################################################
         ,outChorizo: function()
         {//
            return this.c_lg+"00"+this.c_user+this.c_mod+this.c_sec;
         },
      
         // -------------------------------------------------------------------------------------------------------
         ini: function()
         {
            
         }
            
      }; //#############################################################################
 
      return core;
 
   })();
 
   window.itman = window.$$ = itman
;
 
})(window);
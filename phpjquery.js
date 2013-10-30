/**
 *
 * @author Egon Firman <egon.firman@gmail.com>
 *
 */
$(function(){
  function proccessPHPJQueryCallback (data) {
    //uncomment line di bawah ini untuk aktifin log
    if (data.log) { 
      console.log(data.log); 
    }
    if (data.alert) { 
      alert(data.alert); 
    }
    if (data.before) {
      for (i=0;i<data.before.length;i++) {
        $(data.before[i].selector).before(data.before[i].msg);
      }
    }
    if (data.after) {
      for (i=0;i<data.after.length;i++) {
        $(data.after[i].selector).after(data.after[i].msg);
      }
    }
    if (data.html) {
      for (i=0;i<data.html.length;i++) {
        $(data.html[i].selector).html(data.html[i].msg);
      }
    }
    if (data.append) {
      for (i=0;i<data.append.length;i++) {
        $(data.append[i].selector).append(data.append[i].msg);
      }
    }
    if (data.val) {
      for (i=0;i<data.val.length;i++) {
        $(data.val[i].selector).val(data.val[i].msg);
      }
    }
    if (data.focus) { 
      $(data.focus).focus(); 
    }
    if (data.jseval) {
      jseval = decodeURIComponent ((data.jseval +'').replace(/\+/g, '%20'))
        eval (jseval);
    }
    if (data.clone_appendTo) {
      for (i=0;i<data.clone_appendTo.length;i++) {
        $(data.clone_appendTo[i].selector_from).clone().appendTo(data.clone_appendTo[i].selector_to);
      }
    }
    if (data.addClass) {
      for (i=0;i<data.addClass.length;i++) {
        $(data.addClass[i].selector).removeClass(data.removeClass[i].msg);
      }
    }
    if (data.removeClass) {
      for (i=0;i<data.removeClass.length;i++) {
        $(data.removeClass[i].selector).removeClass(data.removeClass[i].msg);
      }
    }
    if (data.redirect) {
      window.location = data.redirect
    }
  }


  jQuery.fn.phpjquerycallback = function () {
    return this.each(function () {

      // if its form
      if (this.tagName == 'FORM') {
        this.onsubmit = function(e) {
          $.ajax({ 
            url      : this.getAttribute('action'), 
            data     : $(this).serialize(),
            type     : this.getAttribute('method'),
            dataType : 'json',
            success  : proccessPHPJQueryCallback,
            error    : function (obj,stat) {
              alert (stat + ":" + obj.responseText);
            }
          });
          return false;
        }
      }

      // if its an input
      else if (this.tagName == 'INPUT' || this.tagName == 'TEXTAREA' ) {
        this.onchange = function(e) {
          console.log(e);
          $.ajax({ 
            url      : this.getAttribute('data-url'), 
            data     : $(this).serialize(),
            dataType : 'json',
            success  : proccessPHPJQueryCallback,
            error    : function (obj,stat) {
              alert (stat + ":" + obj.responseText);
            }
          });
        };
      }
    });
  };

    
  jQuery.processPHPJQueryCallback = proccessPHPJQueryCallback;
});

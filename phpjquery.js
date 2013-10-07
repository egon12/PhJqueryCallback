
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
    if (data.redirect) {
      window.location = data.redirect
    }
  }

  jQuery.fn.phpjquerycallback = function () {
    return this.each(function () {
      $(this).removeAttr('onsubmit')
      .submit(function (e) {
        e.preventDefault();
        $.ajax({
          url      : $(this).attr('action'), 
          data     : $(this).serialize(),
          dataType : 'json',
          success  : proccessPHPJQueryCallback,
          error    : function (obj,stat) {
            alert (stat + ":" + obj.responseText);
          }
        });
      });
    });
  };
});

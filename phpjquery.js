
$(function(){
  function proccessPHPJQueryCallback (data) {
    //uncomment line di bawah ini untuk aktifin log
    if (data.log) { 
      console.log(data.log); 
    }
    if (data.jsprint) { 
      //require jzebra
      try {
        var applet = document.jzebra;
        applet.findPrinter();
        applet.append(data.jsprint);
        applet.append("\n\n\n\n\n\n\n\n\n\n"); //give some Space
        applet.append("\x1bm"); //for cut
        applet.print();
      } catch (err) {
        alert ("Error\nPrinter bermasalah:\n");
      }
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
});

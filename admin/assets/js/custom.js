function convertToSlug(Text) {
    return Text.toLowerCase()
               .replace(/ /g, '-')
               .replace(/[^\w-]+/g, '').trim();
  }

 function createurl(value){
  $("#input2").val(value);
   var slug= convertToSlug(value);
    $('#sluggenrated').val(slug)
 }



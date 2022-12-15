function convertToSlug(Text) {
    return Text.toLowerCase()
               .replace(/ /g, '-')
               .replace(/[^\w-]+/g, '');
  }

 function createurl(value){
   var slug= convertToSlug(value);
    $('#sluggenrated').val(slug)
 }



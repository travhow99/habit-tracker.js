$(document).ready(function(){
  $('.tracker-toggle').change(function(){
      let $for = $(this).attr('for');

      let $checkedLength = $(this).is(':checked');

      console.log($checkedLength);

      if (1 == $checkedLength){
          alert('checked');
      } else {
          alert('unchecked');
      }

      $.post('habit-form.php', $for, function(){
        console.log(`${$checkedLength} ${$for}`);
      });
  });



});

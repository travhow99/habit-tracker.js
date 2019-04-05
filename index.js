$(document).ready(function() {
  checkBoxes();

  $('.tracker-toggle').change(function(){

      // see if checked
      let $checkedLength = $(this).is(':checked');
      if ($checkedLength){
          //alert('checked');
      } else {
          //alert('unchecked');
      }

      let $habit = $(this).siblings('.habit-title').text();
      console.log($habit);

      let data = {
        // week in php
        // User id in php
        //name: '$habit',
        goal: 5,
        day: $(this).attr('for'),
        checked: +$checkedLength,
        category: 'main',
      }

      data.name = $habit;

      console.log(data);



    $.post('habit-form.php', data, function(data){

      }).fail(function() {

          // just in case posting your form failed
          alert( "Posting failed." );

      });
    });

    // Add new button
    $('.add-new').click(function() {
      $('.overlay').show();
      $('.habit-form').show();
    });

    $('#newHabitSubmit').click(function(event) {
      event.preventDefault();
      //console.log();
      const $name = $('.habit-form input[name="name"]').val();
      const $goal = $('.habit-form input[name="goal"]').val();

      const data = {
        name: $name,
        goal: $goal,
      }
      console.log(data);

      $.post('new-habit.php', data, function(data){


        // show the response
        //$('#response').html(data);
          //console.log(`${$checkedLength}`);
        }).fail(function() {

            // just in case posting your form failed
            alert( "Posting failed." );

        });
        location.reload();

        $('.overlay').hide();
        $('.habit-form').hide();

      });
});

function checkBoxes() {
  console.log('check');
  $('.active').prop('checked', true);
}

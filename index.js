$(document).ready(function() {
  checkBoxes();

  $('.tracker-toggle').click(function(){
      // see if checked
      let $checkedLength = $(this).is(':checked');
      
      let isChecked = $(this).hasClass('active');
      console.log(isChecked);
      
      

      let $habit = $(this).siblings('.habit-name').children('.habit-title').text();
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
      const $nameField = $('.habit-form input[name="name"]').parent();
      const $goal = $('.habit-form input[name="goal"]').val();
      const $goalField = $('.habit-form input[name="goal"]').parent();
      const $category = $('#categoryInput').val();
      const $categoryField = $('#categoryInput').parent();

      const formInput = [{input: $name, field: $nameField}, {input: $goal, field: $goalField}, {input: $category, field: $categoryField}];

      let error = false;

      for (let x in formInput) {
        let {input, field} = formInput[x];

        console.log(input, field);

        if (input === "" || input === null) {
          field.addClass('input-error');
          field.children('.fa-exclamation-circle').removeClass('fa-hidden');
          console.log('danger');
          error = true;
        }
      }

      if (error) {
        return false;
      }

      const data = {
        name: $name,
        goal: $goal,
        category: $category
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
        //location.reload();

        $('.overlay').hide();
        $('.habit-form').hide();

       });
});

function checkBoxes() {
  console.log('check');
  $('.active').prop('checked', true);
};

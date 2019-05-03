$(document).ready(function() {
  checkBoxes();

  $('.add-button').click(function() {
    $(this).siblings('.confirm-btn').show();
    $(this).siblings('.habit-goal').css('display', 'inline-block');
    const $input = $(this).siblings('.habit-name').addClass('editable');
    $input.focus();
  });

  $('.confirm-btn').click(function() {
    const $newHabit = $(this).siblings('.habit-name.editable').val();
    const $habitGoal = $(this).siblings('.habit-goal').find('input').val();
    const $category = $(this).parents('.category').children('h3').text();

    console.log($category);

    $.post('new-habit.php', {name: $newHabit, goal: $habitGoal, category: $category}, function(data) {
      location.reload();
    }).fail(function() {
      alert( "Posting failed." );
    });



  });

  $('.tracker-toggle').click(function(){
      // see if checked      
      let isChecked = $(this).hasClass('active');
      console.log(isChecked);
      
      isChecked ? ($(this).removeClass('active'), $(this).empty()) : ($(this).addClass('active'), $(this).append('<i class="fas fa-check-circle"></i>'));

      let $habit = $(this).parent().siblings('.habit-name').children('.habit-title').text();
      console.log($habit);

      let data = {
        // week in php
        // User id in php
        //name: '$habit',
        day: $(this).attr('for'),
        checked: +!isChecked,
      }

      // Should use `id` rather than name

      data.name = $habit;




    $.post('habit-form.php', data, function(data) {

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

    $('.close-button').click(function() {
      $('.overlay').hide();
      $('.habit-form').hide();
    });

    $('#categoryInput').change(function() {
      const categoryInput = `<div class="form-group" id="newCategoryInput">
      <label for="">Enter a name for your new category:</label>  <i class="fa-hidden fas fa-exclamation-circle"></i>
      <input type="text" name="category" class="form-control" id="" placeholder="New Category">
    </div>`
      const $selected = $(this).val();
      if ($selected == 10000) {
        $(this).parent().after(categoryInput);
      } else {
        $("#newCategoryInput").remove();
      }
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
      const $newCategory = $('#newCategoryInput input').val();
      const $newCategoryField = $('#newCategoryInput');

      const formInput = [{input: $name, field: $nameField}, {input: $goal, field: $goalField}, {input: $category, field: $categoryField}];
      
      if ($('#newCategoryInput').length) {
        formInput.push({input: $newCategory, field: $newCategoryField});
      }

      console.log(formInput);

      let error = false;

      for (let x in formInput) {
        let {input, field} = formInput[x];

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

      console.log($newCategory);

      const data = {
        name: $name,
        goal: $goal,
        category: $newCategory ? $newCategory : $category,
      }
      console.log(data);

      $.post('new-habit.php', data, function(data){


        // show the response
        //$('#response').html(data);
          //console.log(`${$checkedLength}`);
        }).done(function() {
          location.reload();
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

(function ($) {
  $('.spinner .btn:first-of-type').on('click', function() {
    $('.spinner input').val( parseInt($('.spinner input').val(), 10) + 1);
  });
  $('.spinner .btn:last-of-type').on('click', function() {
    $('.spinner input').val( parseInt($('.spinner input').val(), 10) - 1);
  });
})(jQuery);

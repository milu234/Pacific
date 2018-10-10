//Open dropdown when clicking on element
$(document).on('click', "a[data-dropdown='notificationMenu']",  function(e){
  e.preventDefault();
  
  var el = $(e.currentTarget);
  
  $('body').prepend('<div id="dropdownOverlay" style="background: transparent; height:100%;width:100%;position:fixed;"></div>')
  
  var container = $(e.currentTarget).parent();
  var dropdown = container.find('.dropdown');
  var containerWidth = container.width();
  var containerHeight = container.height();
  
  var anchorOffset = $(e.currentTarget).offset();

  dropdown.css({
    'right': containerWidth / 2 + 'px'
  })
  
  container.toggleClass('expanded')
  
});

//Close dropdowns on document click

$(document).on('click', '#dropdownOverlay', function(e){
  var el = $(e.currentTarget)[0].activeElement;
  
  if(typeof $(el).attr('data-dropdown') === 'undefined'){
    $('#dropdownOverlay').remove();
    $('.dropdown-container.expanded').removeClass('expanded');
  }
})

//Dropdown collapsile tabs
$('.notification-tab').click(function(e){
  if($(e.currentTarget).parent().hasClass('expanded')){
    $('.notification-group').removeClass('expanded');
  }
  else{
    $('.notification-group').removeClass('expanded');
    $(e.currentTarget).parent().toggleClass('expanded');
  }
})
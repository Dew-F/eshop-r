function refresh(tabs) {
   tabs.find('.tab').not('.active').css({"display":"none"});
   tabs.find('.tab.active').css({"display":"block"});
   $(tabs).find('.tab').not('.active').find('input').prop('disabled', true);
   $(tabs).find('.tab.active').find('input').prop('disabled', false);
}

$(document).ready(function() {
   $('.tab').not('.active').css({"display":"none"});
   $('.tab').not('.active').find('input').prop('disabled', true);
   $('.tabs').each(function(i, elem) {
      var text = '<div class="tab-titles">';
      $(elem).find('.tab').each(function(i, elem) {
         text += '<div class="tab-title">'+$(elem).attr('title')+'</div>';
      });
      text += '</div>';
      $(elem).prepend(text);
      $(elem).find('.tab-titles').find('.tab-title').eq($(elem).find('.active').index()-1).addClass('active');
   });
   $('.tab.active').css({"display":"block"});
   $('.tab.active').find('input').prop('disabled', false);

   $('.tab-title').click(function() {
      var tabs = $(this).parents('.tabs');
      tabs.find('.tab-titles').find('.tab-title.active').removeClass('active');
      tabs.find('.tab.active').removeClass('active');
      $(this).addClass('active');
      $(this).parents('.tabs').find('.tab[title="'+$(this).text()+'"]').addClass('active');
      $(refresh(tabs));
   });
});
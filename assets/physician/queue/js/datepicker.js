$.datepicker.regional['th'] = {
  changeMonth: true,
  changeYear: true,
  yearOffSet: 543,
  showOn: "button",
  buttonImage: '<?php echo base_url() ?>images/calendar.gif',
  buttonImageOnly: true,
  dateFormat: 'dd M yy',
  dayNames: ['à¸­à¸²à¸—à¸´à¸•à¸¢à¹Œ', 'à¸ˆà¸±à¸™à¸—à¸£à¹Œ', 'à¸­à¸±à¸‡à¸„à¸²à¸£', 'à¸žà¸¸à¸˜', 'à¸žà¸¤à¸«à¸±à¸ªà¸šà¸”à¸µ', 'à¸¨à¸¸à¸à¸£à¹Œ', 'à¹€à¸ªà¸²à¸£à¹Œ'],
  dayNamesMin: ['à¸­à¸²', 'à¸ˆ', 'à¸­', 'à¸ž', 'à¸žà¸¤', 'à¸¨', 'à¸ª'],
  monthNames: ['à¸¡à¸à¸£à¸²à¸„à¸¡', 'à¸à¸¸à¸¡à¸ à¸²à¸žà¸±à¸™à¸˜à¹Œ', 'à¸¡à¸µà¸™à¸²à¸„à¸¡', 'à¹€à¸¡à¸©à¸²à¸¢à¸™', 'à¸žà¸¤à¸©à¸ à¸²à¸„à¸¡', 'à¸¡à¸´à¸–à¸¸à¸™à¸²à¸¢à¸™', 'à¸à¸£à¸à¸Žà¸²à¸„à¸¡', 'à¸ªà¸´à¸‡à¸«à¸²à¸„à¸¡', 'à¸à¸±à¸™à¸¢à¸²à¸¢à¸™', 'à¸•à¸¸à¸¥à¸²à¸„à¸¡', 'à¸žà¸¤à¸¨à¸ˆà¸´à¸à¸²à¸¢à¸™', 'à¸˜à¸±à¸™à¸§à¸²à¸„à¸¡'],
  monthNamesShort: ['à¸¡.à¸„.', 'à¸.à¸ž.', 'à¸¡à¸µ.à¸„.', 'à¹€à¸¡.à¸¢.', 'à¸ž.à¸„.', 'à¸¡à¸´.à¸¢.', 'à¸.à¸„.', 'à¸ª.à¸„.', 'à¸.à¸¢.', 'à¸•.à¸„.', 'à¸ž.à¸¢.', 'à¸˜.à¸„.'],
  constrainInput: true,
  minDate: 0,
  maxDate: '+1M',
  prevText: 'à¸à¹ˆà¸­à¸™à¸«à¸™à¹‰à¸²',
  nextText: 'à¸–à¸±à¸”à¹„à¸›',
  yearRange: '-20:+0',
  buttonText: 'à¹€à¸¥à¸·à¸­à¸',
};
$.datepicker.setDefaults($.datepicker.regional['th']);
$(function() {
  $("#datepicker").datepicker($.datepicker.regional["th"]);
  $("#datepicker").datepicker("setDate", new Date());
});
var Holidays;

function CheckDate(date) {
  var day = date.getDate();
  var selectable = true;
  var CssClass = '';
  if (Holidays != null) {
    for (var i = 0; i < Holidays.length; i++) {
      var value = Holidays[i];
      if (value == day) {
        selectable = false;
        CssClass = 'specialDate';
        break;
      }
    }
  }
  return [selectable, CssClass, ''];
}

function SelectedDate(dateText, inst) {
  var DateText = inst.selectedDay + '/' + (inst.selectedMonth + 1) + '/' + inst.selectedYear;
  return [dateText, inst]
}

function OnBeforShow(input, inst) {
  var month = inst.currentMonth + 1;
  var year = inst.currentYear;
  GetDaysShows(month, year);
}

function ChangMonthAndYear(year, month, inst) {
  GetDaysShows(month, year);
}

function GetDaysShows(month, year) {
  Holidays = [1, 4, 6, 11];
}
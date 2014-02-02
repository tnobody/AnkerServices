$(function()
{
        $('.turn-me-into-datepicker')
                .datePicker({inline:true})
                .bind(
                        'dateSelected',
                        function(e, selectedDate, $td)
                        {
                                console.log('You selected ' + selectedDate);
                        }
                );
});

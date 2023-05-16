(() => {
    window.addEventListener("load" , function (){ 
        const config_date = { 
            "locale": "ja",
            dateFormat: "Y/m/d",
        }   
        const config_time = { 
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            "locale": "ja"
        }   
        const config_dt = { 
            enableTime: true,
            dateFormat: "Y/m/d H:i",
            "locale": "ja"
        }   
        flatpickr(".datePicker", config_date);
        flatpickr(".timePicker", config_time);
        flatpickr(".dateTimePicker",config_dt)
    });
})();
const moviedate = document.querySelector('.moviedate');
const movietime = document.querySelector('.movietime');
const seats = document.querySelector('.seats');
let pay=document.querySelector('.pay');
let selecetdseatno=document.querySelector('.selected-seatno');
let selectseatname=document.querySelector('.selectseat-name');


 
// Define the arrays for days and months
let dayname = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
let monthname = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

// Get current date
const currentdate = new Date();

// Generate dates and add to HTML
for (let i = 0; i <= 5; i++) {
    let newDate = new Date();
    newDate.setDate(currentdate.getDate() + i);
    let day = newDate.getDay();
    let date = newDate.getDate();
    let month = newDate.getMonth();
    let fullDate = `${dayname[day]}, ${String(date).padStart(2, '0')} ${monthname[month]}`;

    moviedate.insertAdjacentHTML(
        "beforeend",
        `<div class="datediv" data-date="${fullDate}">
            <span class="date">${dayname[day]}</span>
            <span class="day">${String(date).padStart(2, '0')}</span>
            <span class="month">${monthname[month]}</span>
        </div>`
    );
}

// Generate showtimes and add to HTML
const endHour = 23;  // 11:00 PM
const endMinute = 30;  // 11:30 PM

let now = new Date();
let hours = now.getHours();
let minutes = now.getMinutes();

// Adjust to the next 30-minute slot
if (minutes > 30) {
    hours += 1;
    minutes = 0;
} else {
    minutes = 30;
}

while ((hours < endHour) || (hours === endHour && minutes <= endMinute)) {
    const ampm = hours >= 12 ? 'PM' : 'AM';
    let displayHour = hours % 12;
    displayHour = displayHour ? displayHour : 12;  // Convert 0 hours to 12 for 12-hour format

    // Format minutes correctly and prevent invalid values
    let formattedMinutes = minutes === 30 ? '30' : '00';
    
    movietime.insertAdjacentHTML(
        "beforeend",
        `<div class="timediv" data-time="${displayHour}:${formattedMinutes} ${ampm}">
            <span class="hours">${displayHour}:${formattedMinutes} ${ampm}</span>
        </div>`
    );

    // Increment time by 3 hours
    hours += 3;
    if (hours >= 24) break;  // Prevent exceeding 24 hours in a day
}

// Event handling for date selection
$(document).ready(function () {
    
    $('.datediv').click(function () {
        $('.datediv').removeAttr('id');
        $(this).attr('id', 'active');
        let selectedDate = $(this).data('date');
        $('input[name="mdate"]').val(selectedDate); // Update hidden input with selected date
    });

    // Event handling for time selection
    $('.timediv').click(function () {
        $('.timediv').removeAttr('id');
        $(this).attr('id', 'active');
        let selectedTime = $(this).data('time');
        $('input[name="mtime"]').val(selectedTime); // Update hidden input with selected time
    });
});


$(document).ready(function () {
    $('option').select();
})
for (let i = 65; i < 76; i++) {
    let rendint = Math.floor(Math.random() * 10);
    let alphabet = String.fromCharCode(i);
    let rowHTML = `<tr><td><span class="row">${alphabet}</span></td>`;
    
    for (let j = 1; j < 18; j++) {
        if ((alphabet == 'F' || alphabet == 'G' || alphabet == 'D' || alphabet == 'E' || alphabet == 'I' || alphabet == 'J' || alphabet == 'K') && j > 6 && j <= 10) {
            rowHTML += `<td> &nbsp;</td>`
        }
        else if (alphabet == 'H' && j >= 1 && j <= 17) {
            rowHTML += `<td> &nbsp;</td>`;
        }
        else {
            // let booked = rendint === 1 ? "booked" : "";
            rowHTML += `<td><label class="seat" id="${alphabet}${j}">${j}</label></td>`;
        }
    }

    rowHTML += `</tr>`;

    seats.insertAdjacentHTML("beforeend", rowHTML);
}


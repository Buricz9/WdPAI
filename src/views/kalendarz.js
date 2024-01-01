document.addEventListener("DOMContentLoaded", function () {
    const calendarContainer = document.getElementById("calendar");
  
    function generateCalendar() {
      const today = new Date();
      const currentMonth = today.getMonth();
      const currentYear = today.getFullYear();
  
      const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
      const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();
  
      let calendarHTML = '<div class="calendar-header">';
  
      const monthNames = [
        "Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec",
        "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień"
      ];
  
      calendarHTML += `<span>${monthNames[currentMonth]} ${currentYear}</span></div><div class="calendar-body">`;
  
      for (let i = 0; i < firstDayOfMonth; i++) {
        calendarHTML += '<div class="calendar-day empty"></div>';
      }
  
      for (let i = 1; i <= daysInMonth; i++) {
        calendarHTML += `<div class="calendar-day">${i}</div>`;
      }
  
      calendarHTML += '</div>';
  
      calendarContainer.innerHTML = calendarHTML;
    }
  
    generateCalendar();
  });
  
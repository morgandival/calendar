# calendar
A simple calendar.

**Link to project:** https://github.com/morgandival/calendar

## How It's Made:

**Tech used:** HTML, CSS, JS, PHP.

This project uses PHP to dynamically generates a calendar based on the current month or a month that is passed in through the URL parameters. It leans heavily on the PHP date functionality to produce the output.

The PHP returns HTML with CSS grid styling to create the familiar structure of a calendar.

JavaScript then allows the user to click on a day to select it, which with further development could allow for saving the selected day for later use or adding events to the selected day.

## Lessons Learned:

Date manipulation is tricky, but once I got the loops working with the right offsets, the previous month's end days and the next month's start days displayed correctly.
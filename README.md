
# gCalendar test

## Google calendar api testing

Backend language - PHP  
PHP Framework - Laravel  

testing email address: gcalendartesting1337@gmail.com  
testing email password: Test123!  

What currently works:  
* Form and form validation (basic js validation and laravel validation)  
* Communication with google calendar api - possible to creatre events  
* spam protection ( captcha )  


What currently doesn't work:  
* Setting attendees in event (issue with Domain-wide delegation)  
* Notifications ( no attendees )  

note: The code is there for both attendees and reminders and it "should"  
work, however GSuite is not set. As far as i could read, google's or any others  
custom domain is needed to set everyone in the same group or team which  
is not possible with basic gmail, but i might be wrong.


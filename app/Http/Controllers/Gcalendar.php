<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Google_Client;
use Google_Exception;
use Google_Service_Calendar;
use Google_Service_Calendar_EventAttendee;
use Google_Service_Calendar_EventDateTime;
use Google_Service_Calendar_EventReminder;
use Google_Service_Calendar_EventReminders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class Gcalendar extends Controller
{

    private function getClient() : ?Google_Client {
        $google_client = new Google_Client();

        if ($credentials = $this->getClientCredentialsFile()) {
            try {
                $google_client->setAuthConfig($credentials);
            } catch (Google_Exception $e) {
                Log::error($e->getMessage());
            }
        } else {
            Log::error("Error getting credentials for account.");
            return null;
        }

        $google_client->setApplicationName("gCalendar-test");
        $google_client->setScopes(array([Google_Service_Calendar::CALENDAR, Google_Service_Calendar::CALENDAR_EVENTS]));

        return $google_client;
    }

    /**
     * @return bool|string
     */
    private function getClientCredentialsFile() {
        $credentials = storage_path() . '/gcalendar_credentials.json';

        if (!file_exists($credentials)) {
            Log::error("File doesnt exist");
        }

        return file_exists($credentials)? $credentials : false;
    }

    public function process_request(Request $request) {
        $validator = Validator::make($request->all() ,[
            'name' => ['required'],
            'phone' => ['required'],
            'email' => ['required'],
            'time' => ['required'],
            'date' => ['required'],
            'captcha' => ['captcha']
        ]);

        if ($validator->fails()) {
            Log::error("Validation of form failed.");
            return $validator->errors();
        }

        $name = $request->input("name");
        $phone = $request->input("phone");
        $email = $request->input("email");
        $date = $request->input("date");
        $time = $request->input("time");
        $captcha = $request->input("captcha");


        $google_client = $this->getClient();
        if ($google_client == null) {
            Log::error("Failed to create google client.");
            return false;
        }

        $service = new Google_Service_Calendar($google_client);
        $calendar_id = "gcalendartesting1337@gmail.com";

        // creating event
        $event = new \Google_Service_Calendar_Event();
        $event->setSummary("gCalendar-test Event");

        // start and end time
        $datetime = new Carbon($date. " " .$time);
        $start_datetime = new Google_Service_Calendar_EventDateTime();
        $start_datetime->setDateTime($datetime->format("Y-m-d\TH:i:s"));
        $start_datetime->setTimeZone("Europe/Berlin");
        $event->setStart($start_datetime);

        $end_datetime = new Google_Service_Calendar_EventDateTime();
        $end_datetime->setDateTime($datetime->addHour()->format("Y-m-d\TH:i:s"));
        $end_datetime->setTimeZone("Europe/Berlin");
        $event->setEnd($end_datetime);

        // set attendee
        $attendee = new Google_Service_Calendar_EventAttendee();
        $attendee->setDisplayName($name);
        $attendee->setEmail($email);
        $attendee->setComment($phone);
        $event->setAttendees(array([$attendee]));

        // add reminders
        $event_reminder = new Google_Service_Calendar_EventReminders();
        $event_reminder->setUseDefault(false);
        $override30 = new Google_Service_Calendar_EventReminder();
        $override30->setMethod("email");
        $override30->setMinutes("30");
        $override15 = new Google_Service_Calendar_EventReminder();
        $override15->setMethod("email");
        $override15->setMinutes("15");
        $event_reminder->setOverrides(array($override30, $override15));
        $event->setReminders($event_reminder);

        Log::info("Inserting event...");
        $service->events->insert($calendar_id, $event);
        Log::info("Everything went okay.");
        return true;
    }
}

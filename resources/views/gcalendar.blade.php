@extends("layouts.layout")

@section("content")
    <div class="form-row mb-2">
        <div class="col-sm-1">
            <label for="name">Name</label>
        </div>
        <div class="col-sm-4">
            <input class="form-control" type="text" id="name" required/>
        </div>
        <div id="name_error" class="alert alert-danger" style="display: none">Please insert valid name.</div>
    </div>
    <div class="form-row mb-2">
        <div class="col-sm-1">
            <label for="phone">Phone</label>
        </div>
        <div class="col-sm-4">
            <input class="form-control" type="phone" id="phone" required/>
        </div>
        <div id="phone_error" class="alert alert-danger" style="display: none">Please insert valid phone.</div>
    </div>
    <div class="form-row mb-2">
        <div class="col-sm-1">
            <label for="email">Email</label>
        </div>
        <div class="col-sm-4">
            <input class="form-control" type="email" id="email" required/>
        </div>
        <div id="email_error" class="alert alert-danger" style="display: none">Please insert valid email.</div>
    </div>
    <div class="form-row mb-2">
        <div class="col-sm-1">
            <label for="time">Time</label>
        </div>
        <div class="col-sm-4">
            <input class="form-control" type="time" id="time" required/>
        </div>
        <div id="time_error" class="alert alert-danger" style="display: none">Please insert valid time.</div>
    </div>
    <div class="form-row mb-2">
        <div class="col-sm-1">
            <label for="date">Date</label>
        </div>
        <div class="col-sm-4">
            <input class="form-control" type="date" id="date" required/>
        </div>
        <div id="date_error" class="alert alert-danger" style="display: none">Please insert valid date.</div>
    </div>
    <div class="form-row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2">
            <button id="btn_add" class="btn btn-primary">Add to Calendar</button>
        </div>
        <div class="col-sm-3 valid-tooltip"></div>
    </div>

    <div id="success" class="alert alert-success" style="display: none">Success.</div>
    <div id="error" class="alert alert-danger" style="display: none">Something went wrong.</div>
@stop
@include('include.scripts')
@stack("gcalendar")

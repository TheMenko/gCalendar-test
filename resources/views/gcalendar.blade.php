@extends("layouts.layout")

@section("content")
    <form>
        <div class="form-row mb-2">
            <div class="col-sm-1">
                <label for="name">Name</label>
            </div>
            <div class="col-sm-4">
                <input class="form-control" type="text" id="name" required/>
            </div>
            <div class="col-sm-3 valid-tooltip"></div>
        </div>
        <div class="form-row mb-2">
            <div class="col-sm-1">
                <label for="phone">Phone</label>
            </div>
            <div class="col-sm-4">
                <input class="form-control" type="phone" id="phone" required/>
            </div>
            <div class="col-sm-3 valid-tooltip"></div>
        </div>
        <div class="form-row mb-2">
            <div class="col-sm-1">
                <label for="email">Email</label>
            </div>
            <div class="col-sm-4">
                <input class="form-control" type="email" id="email" required/>
            </div>
            <div class="col-sm-3 valid-tooltip"></div>
        </div>
        <div class="form-row mb-2">
            <div class="col-sm-1">
                <label for="time">Time</label>
            </div>
            <div class="col-sm-4">
                <input class="form-control" type="time" id="time" required/>
            </div>
            <div class="col-sm-3 valid-tooltip"></div>
        </div>
        <div class="form-row mb-2">
            <div class="col-sm-1">
                <label for="date">Date</label>
            </div>
            <div class="col-sm-4">
                <input class="form-control" type="date" id="date" required/>
            </div>
            <div class="col-sm-3 valid-tooltip"></div>
        </div>
        <div class="form-row">
            <div class="col-sm-1"></div>
            <div class="col-sm-2">
                <button id="btn_add" class="btn btn-primary">Add to Calendar</button>
            </div>
            <div class="col-sm-3 valid-tooltip"></div>
        </div>
    </form>
@stop

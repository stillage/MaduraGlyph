@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Questionnaire</div>

                <div class="card-body">
                        <form action="/questionnaires" method="post">
                            @csrf 

                            <div class="form-group">
                                    <label for="title">Title</label>
                                    <input name="title" type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter Title">
                                    <small id="titleHelp" class="form-text text-muted">Give your Questionnaire a title</small>

                                    <div>
                                            @error ('title')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                    </div>
                            </div>

                            <div class="form-group mt-4">
                                    <label for="purpose">Purpose</label>
                                    <input name="purpose" type="text" class="form-control" id="purpose" aria-describedby="purposeHelp" placeholder="Enter Purpose">
                                    <small id="purposeHelp" class="form-text text-muted">Giving a purpose will increase chances of a response</small>

                                    <div>
                                        @error ('purpose')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Create Questionnaire</button>
                            
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

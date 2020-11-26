@extends('layouts.dashboard.template')

@section('content')
<div class="card-header"><strong>ADD DATA</strong></div>
                <div class="card-body">
                        <form role="form" method="POST" action="">
                            {{ csrf_field() }} 
                            <div class="form-group" style="display:">
                                <label>Name :</label>
                                <input type="text" required="" class="form-control" name="name" value="" placeholder=""/>
                            </div>
                            <div class="form-group" style="display:">
                                <label>Email :</label>
                                <input type="email" required="" class="form-control" name="email" value="" placeholder=""/>
                            </div>
                            <div class="form-group" style="display:">
                                <label>No HP :</label>
                                <input type="telp" required="" class="form-control" name="no_hp" value="" placeholder=""/>
                            </div>
                            <div class="form-group" style="display:">
                                <label>Address :</label>
                                <input required="" class="form-control" name="address" value="" placeholder=""/>
                            </div>
                            <div class="form-group" style="display:">
                                <label>Gender :</label>
                                <div>
                                <div class="checkbox">
                                        <input id="cballshow" value="1" name="gender" type="radio">Male &nbsp;
                                        <input id="cballshow" value="0" name="gender" type="radio">Female

                                </div>
                                </div>
                            </div>
                            <div class="form-group" style="display:">
                                <label>Password :</label>
                                <input required="" class="form-control" name="password" value="" placeholder=""/>
                            </div>
                            <div class="box-footer">
                                <input type="submit" name="submit" type="submit" class="btn btn-primary pull-right" value="SUBMIT"></input>
                            </div>
                        </form>
                </div>
@endsection

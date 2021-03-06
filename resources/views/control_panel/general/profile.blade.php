<div id="profile_content" class="invisible">
    <div class="columns">
        <div class="column has-text-centered">
            <span class="icon">
                @if($current_user->user_type == 0)
                <i class="fas fa-crown" ></i>
                @elseif($current_user->user_type == 1)
                <i class="fas fa-user-ninja"></i>
                @else
                <i class="fas fa-user"></i>
                @endif
            </span>

            <h3 class="subtitle">{{$current_user->name}}</h3>

            <form action="control/update_profile" method="POST" id="profile_form">
                @csrf
                {{-- input - username --}}
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Username</label>
                    </div>

                    <div class="field-body">
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input class="input @error('username') is-danger @enderror" id="username" maxlength="25" name="username" 
                                type="text" placeholder="User" 
                                value="@if($errors->any()){{old('username')}}@else{{$current_user->name}}@endif">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                            </p>  
                            @error('username')
                                <p class="help is-danger"><b>{{ $message }}</b></p>  
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- input - E-Mail --}}
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">E-Mail</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input class="input @error('email') is-danger @enderror" name="email" type="email" placeholder="example@yourmail.com" 
                                value="@if($errors->any()){{old('email')}}@else{{$current_user->email}}@endif">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </p>
                            @error('email')
                                <p class="help is-danger"><b>{{ $message }}</b></p>  
                            @enderror
                        </div>
                    </div>
                </div>

                  {{-- input - Password --}}
                  <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Password</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input class="input @error('password') is-danger @enderror" name="password" type="password" placeholder="Password" 
                                value="@if($errors->any()){{old('password')}}@endif">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-key"></i>
                                </span>
                            </p>
                            @error('password')
                                <p class="help is-danger"><b>{{ $message }}</b></p>  
                            @enderror
                        </div>
                    </div>
                </div>

                  {{-- input - Confirm Password --}}
                  <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Confirm password</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input class="input" name="password_confirmation" type="password" placeholder="Confirm password">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-key"></i>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label">

                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-link" id="save_profile">
                                    <span class="icon">
                                        <i class="fas fa-save"></i>
                                    </span>
                                    <span>Save</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@if(Auth::user()->user_type == 2) 
<script>
    $(document).ready(function(){
        $("#profile_tab").click();
    })
</script>
@endif
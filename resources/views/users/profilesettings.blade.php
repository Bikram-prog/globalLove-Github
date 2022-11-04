@include('header')

<div class="container">
    <div class="row" style="margin-top: 40px;">
        <div class="col-md-6">
            <h4>Profile Settings</h4>
            <p>Update your profile display options and localization.</p>
            <h4>Online Options:</h4><hr>

            <form action="/profilesettingspost" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label style="font-weight: 700;">Online Status:</label> <br>
                    <input type="radio" <?php echo (isset($profile[0]->onln_status) && $profile[0]->onln_status == 'online' ? 'checked' : ''); ?> name="onlnstts" value="online"> Show me as online <br>
                    <input type="radio" <?php echo (isset($profile[0]->onln_status) && $profile[0]->onln_status == 'busy' ? 'checked' : ''); ?> name="onlnstts" value="busy"> Show me as Busy
                </div>

                <div class="form-group">
                    <label style="font-weight: 700;">Display Profile:</label> <br>
                    <input type="radio" <?php echo (isset($profile[0]->display_status) && $profile[0]->display_status == 'show' ? 'checked' : ''); ?> name="disstts" value="show"> Display my profile to users <br>
                    <input type="radio" <?php echo (isset($profile[0]->display_status) && $profile[0]->display_status == 'hide' ? 'checked' : ''); ?> name="disstts" value="hide"> Hide my profile from users
                </div>


                <div class="form-group">
                    <label style="font-weight: 700;">Offline Message:</label> <br>
                    <input type="radio" <?php echo (isset($profile[0]->offline_message) && $profile[0]->offline_message == 1 ? 'checked' : ''); ?> name="offline_message" value="1"> Enable (when turn on you will recieve offline messages on your email) <br>
                    <input type="radio" <?php echo (isset($profile[0]->offline_message) && $profile[0]->offline_message == 0 ? 'checked' : ''); ?> name="offline_message" value="0"> Disable (when turn off you will not recieve any offline messages on email)
                </div>

                <div class="form-group">
                    <label style="font-weight: 700;">Recieve email,update and newsletter:</label> <br>
                    <input type="radio" <?php echo (isset($profile[0]->subscribe_newsletter) && $profile[0]->subscribe_newsletter == 1 ? 'checked' : ''); ?> name="subscribe_newsletter" value="1"> Yes<br>
                    <input type="radio" <?php echo (isset($profile[0]->subscribe_newsletter) && $profile[0]->subscribe_newsletter == 0 ? 'checked' : ''); ?> name="subscribe_newsletter" value="0"> No
                </div>

                <div class="form-group">
                    <label style="font-weight: 700;">Hide photos:</label> <br>
                    <input type="radio" <?php echo (isset($profile[0]->hide_status) && $profile[0]->hide_status == 1 ? 'checked' : ''); ?> name="hide_photos" value="1"> Yes<br>
                    <input type="radio" <?php echo (isset($profile[0]->hide_status) && $profile[0]->hide_status == 0 ? 'checked' : ''); ?> name="hide_photos" value="0"> No
                </div>

                <button style=" 
margin: 0 auto;
display: flex;
justify-content: center;
align-items: center;
align-content: center;
width: 120px;
font-size: 18px;
letter-spacing: 2.0px;
" onclick="search()" type="submit" class="btn btn-primary mb-4">SAVE</button>
            </form>
        </div>
        <div class="col-md-6"></div>
    </div>
</div>

@include('footer')
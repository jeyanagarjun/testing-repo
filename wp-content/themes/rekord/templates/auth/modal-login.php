<!-- Modal -->
<div class="modal fade " id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content theme-dark p-4">
            <div class="modal-body">
                <?php 

         if (!is_user_logged_in()) :
            get_template_part('templates/auth/form', 'login');    
         else:
            get_template_part('templates/auth/loggedin', 'user');   
		 endif;
              ?>
            </div>

        </div>
    </div>
</div>
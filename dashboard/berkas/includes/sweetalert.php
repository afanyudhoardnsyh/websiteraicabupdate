<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php 
        if(isset($_SESSION['success']) && $_SESSION['success'] !='')
        {
            ?>
                <script>
                    Swal.fire({
                    title: "<?php echo $_SESSION['success'] ?>",
                    icon: "success",
                    confirmButtonColor: "#1786BD"
                    });
                </script>
            <?php
            unset($_SESSION['success']);
        }
    ?>

    <?php 
        if(isset($_SESSION['success_edit']) && $_SESSION['success_edit'] !='')
        {
            ?>
                <script>
                    Swal.fire({
                    title: "<?php echo $_SESSION['success_edit'] ?>",
                    icon: "success",
                    confirmButtonColor: "#1786BD"
                    });
                </script>
            <?php
            unset($_SESSION['success_edit']);
        }
    ?>
    
    <?php 
        if(isset($_SESSION['error']) && $_SESSION['error'] !='')
        {
            ?>
                <script>
                    Swal.fire({
                    title: "<?php echo $_SESSION['error'] ?>",
                    icon: "error",
                    confirmButtonColor: "#1786BD"
                    });
                </script>
            <?php
            unset($_SESSION['error']);
        }
    ?>

    <?php 
        if(isset($_SESSION['error_empty']) && $_SESSION['error_empty'] !='')
        {
            ?>
                <script>
                    Swal.fire({
                    title: "<?php echo $_SESSION['error_empty'] ?>",
                    icon: "error",
                    confirmButtonColor: "#1786BD"
                    });
                </script>
            <?php
            unset($_SESSION['error_empty']);
        }
    ?>

    <?php 
        if(isset($_SESSION['error_filetype']) && $_SESSION['error_filetype'] !='')
        {
            ?>
                <script>
                    Swal.fire({
                    title: "<?php echo $_SESSION['error_filetype'] ?>",
                    icon: "error",
                    confirmButtonColor: "#1786BD"
                    });
                </script>
            <?php
            unset($_SESSION['error_filetype']);
        }
    ?>

    <?php 
        if(isset($_SESSION['error_edit']) && $_SESSION['error_edit'] !='')
        {
            ?>
                <script>
                    Swal.fire({
                    title: "<?php echo $_SESSION['error_edit'] ?>",
                    icon: "error",
                    confirmButtonColor: "#1786BD"
                    });
                </script>
            <?php
            unset($_SESSION['error_edit']);
        }
    ?>
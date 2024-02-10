<script src="/assets/js/core/popper.min.js"></script>
<script src="/assets/js/core/bootstrap.min.js"></script>
<script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="/assets/js/plugins/choices.min.js"></script>
<script src="/assets/js/plugins/dropzone.min.js"></script>
<script src="<?= $app->url('assets/js/Validation.js') ?>"></script>

<script src="/assets/js/plugins/datatables.js"></script>
<script>

    const webRoot = window.location.origin;

    Dropzone.autoDiscover = false;
    if(document.querySelector('#productImg')) {
        const dropzoneElement = document.querySelector('#productImg');
        let myDropzone = new Dropzone(dropzoneElement, {
        url: 'dropZone/upLoadImage', // URL để gửi tệp đã chọn đến máy chủ
        paramName: 'image',
        maxFilesize: 5, // Giới hạn dung lượng tệp (MB)
        addRemoveLinks: true, // Hiển thị nút xóa cho từng tệp
        dictRemoveFile: `<i class="fa-solid fa-circle-xmark"></i>`, // Chữ hoặc biểu tượng để xóa tệp
        dictDefaultMessage: `<i class="fas fa-cloud-upload-alt"></i> Drop files here or click to upload`, // Tin nhắn mặc định
        acceptedFiles: "image/*", // Loại tệp cho phép (trong trường hợp này, chỉ hình ảnh)
        autoProcessQueue: false, // Tắt tự động tải lên
    });
    }
    
    
</script>

<script src="/assets/js/plugins/dragula/dragula.min.js"></script>
<script src="/assets/js/plugins/jkanban/jkanban.js"></script>


<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="/assets/js/argon-dashboard.js"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"845da2b59a020795","version":"2023.10.0","token":"1b7cbb72744b40c580f8633c6b62637e"}' crossorigin="anonymous"></script>
<script src="<?= $app->url('assets/dist/main.bundle.js') ?>"></script>
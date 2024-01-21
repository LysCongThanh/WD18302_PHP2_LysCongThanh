<?php

return [
    /**
     * Controls the maximum size of the POST data that PHP will accept.
     * If this value is set, the `post_max_size` directive in php.ini is ignored.
     * See: https://www.php.net/manual/en/ini.core.php#ini.post-max-size
     */
    'post_max_size' => '20M', // Equivalent to '20480kb'

    /**
     * Controls the maximum number of parameters that are allowed in the URL-encoded data.
     * If a request contains more parameters than this value, it may affect performance.
     * You may also want to check the `max_input_vars` directive in php.ini.
     * See: https://www.php.net/manual/en/info.configuration.php#ini.max-input-vars
     */
    'max_input_vars' => 1000,

    /**
     * The `default_mimetype` directive is used to determine the default media type for HTTP input.
     * This is similar to the 'type' option in the Node.js configuration.
     * See: https://www.php.net/manual/en/ini.core.php#ini.default-mimetype
     */
    'default_mimetype' => 'application/x-www-form-urlencoded',

    /**
     * You may use the `extension` directive to enable or disable specific PHP extensions.
     * This is not an exact equivalent but may help control the PHP environment.
     * See: https://www.php.net/manual/en/ini.core.php#ini.extension
     */
    'extension' => 'on', // Enable extensions as needed
];

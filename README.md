# danielroe/trellis-valet-driver

A driver for [Laravel Valet](https://github.com/laravel/valet) or [Valet Linux](https://github.com/cpriego/valet-linux) that supports the default
[Trellis](https://roots.io/trellis)/[Bedrock](https://roots.io/bedrock/)
install.

## Installing

Download `TrellisValetDriverV3.php` or `TrellisValetDriverV4.php` depending on your Valet version and place it in your `~/.config/valet/Drivers` folder. Now your Trellis/Bedrock folders will display correctly - no configuration required.

This assumes your Trellis directory structure looks like:

    example/      # → Root folder for the project
    ├── trellis/      # → Your clone of this repository
    └── site/         # → A Bedrock-based WordPress site
        └── web/
            ├── app/  # → WordPress content directory (themes, plugins, etc.)
            └── wp/   # → WordPress core (don't touch!)

If you're migrating from Trellis, you'll need to create a `site/.env` file. See [here](https://roots.io/bedrock/docs/environment-variables/) for more information. [TangRufus](https://github.com/TangRufus) has written [Enveigle](https://github.com/ItinerisLtd/enveigle) which creates `site/.env` file from the settings in your `/trellis/group_vars/` directory.

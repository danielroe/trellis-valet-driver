# danielroe/trellis-valet-driver

A driver for [Laravel Valet](https://github.com/laravel/valet) or [Valet Linux](https://github.com/cpriego/valet-linux) that supports the default 
[Trellis](https://roots.io/trellis)/[Bedrock](https://roots.io/bedrock/)
install.

## Installing

Download `TrellisValetDriver.php` and place it in your `~/.valet/Drivers` folder. Now your Trellis/Bedrock folders will display correctly - no configuration required.

This assumes your Trellis directory structure looks like:

    example.com/      # → Root folder for the project
    ├── trellis/      # → Your clone of this repository
    └── site/         # → A Bedrock-based WordPress site
        └── web/
            ├── app/  # → WordPress content directory (themes, plugins, etc.)
            └── wp/   # → WordPress core (don't touch!)


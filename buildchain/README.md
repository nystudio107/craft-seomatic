# `seomatic` buildchain

This buildchain is a self-contained build system for the `seomatic` JavaScript bundle.

## Overview

The buildchain builds & bundles all of the `seomatic` TypeScript/JavaScript code, Vue components, CSS, and any other static resources via Vite via a Docker container.

Source files:

`buildchain/src/`

Built distribution files:

`src/web/assets/dist/`

## Prerequisites

To run the buildchain for development purposes:

- You must have [Docker Desktop](https://www.docker.com/products/docker-desktop/) (or the equivalent) installed
- We assume you're using the [`plugindev`](https://github.com/nystudio107/plugindev) development project. If you're not, see the **If you're not using `plugindev`** section below

## Commands

This buildchain uses `make` as an interface to the buildchain. The following commands are available from the `buildchain/` directory:

- `make build` - Do a distribution build of the CantoDamAsset asset bundle resources into `src/web/assets/dist/`
- `make dev` - Start Vite HMR dev server for local development
- `make clean` - Remove `node_modules/` and `package-lock.json` to start clean (need to run `make image-build` after doing this, see below)
- `make npm XXX` - Run an `npm` command inside the container, e.g.: `make npm run lint` or `make npm install`
- `make ssh` - Open up a shell session into the buildchain Docker container
- `make image-build` - Build the Docker image & run `npm install`

### If you're not using `plugindev`

If you're not using the [`plugindev`](https://github.com/nystudio107/plugindev) development project, you'll need to follow these steps in order to use the HMR for development in local dev:

- For HMR during local development, you'll need the following variable set in your project's `.env` file:
```dotenv
VITE_PLUGIN_DEVSERVER=1
```
The [`craft-plugin-vite`](https://github.com/nystudio107/craft-plugin-vite) library looks for this environment variable to determine whether it should check for a running Vite dev server.

#### If you're also using Docker

- So your project can access the buildchain container over the [internal Docker network](https://docs.docker.com/compose/networking/), you'll need to set the `DOCKER_NETWORK` environment variable before running any buildchain `make` commands:
```bash
env DOCKER_NETWORK=myproject_default make dev
```
...or use any other method for [setting environment variables](https://www.twilio.com/blog/how-to-set-environment-variables.html). This environment variable needs to be set in the shell where you run the buildchain's various `make` commands from, so setting it in your project's `.env` file won't work.

The network your project uses is typically the project name with `_default` appended to it, but it can be explicitly set in the `docker-composer.yaml` like this:
```yaml
networks:
  default:
    name: someproject_default
```

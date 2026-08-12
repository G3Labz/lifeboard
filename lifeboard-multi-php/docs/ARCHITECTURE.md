# lifeboard-multi-php — Architecture

## Standard Name
`lifeboard-multi-php` (Directory: `lifeboard-multi-php`)

## Layer & Stack
- **Layer**: Multi-tier / Monolith (`multi`)
- **Technology**: PHP / HTML / Apache (`php`)
- **Stack Standard**: PHP 8.2+ LTS (Legacy Apache Docker setup)

## Overview
This component is the legacy monolith application for the Lifeboard Dashboard, performing both server-side PHP template rendering (frontend) and direct database connectivity (backend).

## Container Setup
- Docker base image: `php:7.4-apache` (Legacy image baseline)
- Port mapping: `8080:80`

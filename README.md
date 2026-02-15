# Markdown Notes
A production-ready PHP Markdown note-taking app.

## Installation
1. Clone the repository: `git clone https://github.com/username/MarkdownNotes.git`
2. Run `composer install` to install dependencies
3. Create a `.env` file based on `.env.example` and configure your database settings
4. Run `php migration.php` to create database tables
5. Start the application: `php -S localhost:8000`

## Usage
1. Open a web browser and navigate to `http://localhost:8000`
2. Click the "New Note" button to create a new note
3. Enter your note content using Markdown syntax
4. Click "Save" to save the note

## API Documentation
The API uses RESTful principles and returns data in JSON format.

### Endpoints
* `GET /notes`: Retrieves all notes
* `POST /notes`: Creates a new note
* `GET /notes/{id}`: Retrieves a note by ID
* `PUT /notes/{id}`: Updates a note
* `DELETE /notes/{id}`: Deletes a note

## Badges
[![Build Status](https://travis-ci.org/username/MarkdownNotes.svg?branch=master)](https://travis-ci.org/username/MarkdownNotes)
[![Code Coverage](https://coveralls.io/repos/username/MarkdownNotes/badge.svg?branch=master)](https://coveralls.io/r/username/MarkdownNotes)
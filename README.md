# Quick Email Verification
This repository is just an example of the [QuickEmailVerification](https://quickemailverification.com) API usage. I'm not affiliated with the company in any way. **Warning:** you have to obtain an API key first.

Setup is as easy as:

```bash
$ git clone https://github.com/franzose/quickemailverification-example.git
$ composer install
```

Then create the `.env.local` file and put there the API key you previously obtained from the QuickEmailVerification service:

```txt
QEV_API_KEY=your_api_key_here
```

## Testing from CLI

Run this command and watch the output:

```bash
$ bin/console app:verify-email some@email.com
```

## Testing from a browser

First, setup a webserver:

```bash
$ php -S localhost:8000
```

Then go to `/verify?email=some@email.com` and check the response.

const express = require('express');
const nodemailer = require('nodemailer');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

// Use body-parser middleware to parse form data
app.use(bodyParser.urlencoded({ extended: true }));

// Serve HTML form
app.get('/', (req, res) => {
    res.sendFile(__dirname + '/index.html');
});

// Handle form submission
app.post('/subscribe', (req, res) => {
    const email = req.body.email;

    // Save to your database or perform validation

    // Send confirmation email
    const transporter = nodemailer.createTransport({
        service: 'your_email_service_provider',
        auth: {
            user: 'your_email@example.com',
            pass: 'your_email_password',
        },
    });

    const mailOptions = {
        from: 'your_email@example.com',
        to: email,
        subject: 'Subscription Confirmation',
        html: `
            <html>
            <head>
                <title style='color: #d3a140;'>Subscription Confirmation</title>
            </head>
            <body style='background-color: #3C091a; color: #d3a140;'>
                <h2>Subscription Confirmation</h2>
                <p>Thank you for subscribing! You'll now receive our latest updates and exclusive offers.</p>
            </body>
            </html>
        `,
    };

    transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
            return console.error(error);
        }
        console.log('Email sent:', info.response);
    });

    res.send('Subscription successful! Check your email for confirmation.');
});

// Start the server
app.listen(port, () => {
    console.log(`Server is running at http://localhost:${port}`);
});

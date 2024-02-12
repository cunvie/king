const express = require('express');
const bodyParser = require('body-parser');
const nodemailer = require('nodemailer');

const app = express();
const port = 3000;

app.use(bodyParser.json());

app.post('/purchase-success', (req, res) => {
    const purchaseDetails = req.body;

    // Your email sending logic using nodemailer
    const transporter = nodemailer.createTransport({
        service: 'gmail',
        auth: {
            user: 'gogo.lindor@gmail.com',
            pass: 'Billcil_104324'
        }
    });

    const mailOptions = {
        from: 'gogo.lindor@gmail.com',
        to: 'kingcunvie@gmail.com',
        subject: 'Purchase Successful',
        text: `Purchase details: ${JSON.stringify(purchaseDetails)}`
    };

    transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
            return console.error(error);
        }
        console.log('Email sent: ' + info.response);
    });

    res.sendStatus(200);
});

app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
});

from flask import Flask, render_template, g, redirect, abort, request, Blueprint
from flask import Blueprint, g, request, session
from OpenSSL import SSL
from flask_cors import cross_origin


app = Flask(__name__, static_folder='', static_url_path='')

app.secret_key = "pothigai"





@app.route('/')
def show_home():
    return redirect("login.html", code=302)




if __name__ == '__main__':
    app.run(debug=True, host="0.0.0.0")

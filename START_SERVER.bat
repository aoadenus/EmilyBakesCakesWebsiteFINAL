@echo off
REM Emily Bakes Cakes - Local Server Starter

cd /d "%~dp0"

echo.
echo ============================================
echo Emily Bakes Cakes - Local Web Server
echo ============================================
echo.
echo Starting server using Python...
echo.

REM Try Python 3
python -m http.server 8000 >nul 2>&1
if %errorlevel% equ 0 (
    echo.
    echo Server is running!
    echo.
    echo Access the website at:
    echo http://localhost:8000
    echo.
    echo Staff Login Demo:
    echo http://localhost:8000/staff-login.html
    echo Username: admin
    echo Password: password
    echo.
    echo Press Ctrl+C to stop the server
    echo.
    python -m http.server 8000
    exit /b
)

REM Try Python 2
python -m SimpleHTTPServer 8000 >nul 2>&1
if %errorlevel% equ 0 (
    echo.
    echo Server is running!
    echo.
    echo Access the website at:
    echo http://localhost:8000
    echo.
    echo Staff Login Demo:
    echo http://localhost:8000/staff-login.html
    echo Username: admin
    echo Password: password
    echo.
    echo Press Ctrl+C to stop the server
    echo.
    python -m SimpleHTTPServer 8000
    exit /b
)

REM Try Node.js
node --version >nul 2>&1
if %errorlevel% equ 0 (
    echo Python not found. Trying Node.js...
    echo.
    
    REM Check if http-server is installed
    npm list -g http-server >nul 2>&1
    if %errorlevel% equ 0 (
        echo Server is running!
        echo.
        echo Access the website at:
        echo http://localhost:8080
        echo.
        echo Press Ctrl+C to stop the server
        echo.
        http-server
        exit /b
    )
    
    echo Installing http-server...
    call npm install -g http-server
    echo.
    echo Server is running!
    echo.
    echo Access the website at:
    echo http://localhost:8080
    echo.
    echo Press Ctrl+C to stop the server
    echo.
    http-server
    exit /b
)

echo Error: Neither Python nor Node.js found!
echo.
echo Please install one of the following:
echo - Python 3 (https://www.python.org/)
echo - Node.js (https://nodejs.org/)
echo.
pause

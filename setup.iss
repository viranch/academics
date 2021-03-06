; Script generated by the Inno Setup Script Wizard.
; SEE THE DOCUMENTATION FOR DETAILS ON CREATING INNO SETUP SCRIPT FILES!

#define MyAppName "Academics"
#define MyAppVersion "1.0"
#define MyAppPublisher "SEN Team 1, DA-IICT"
#define MyAppURL "https://bitbucket.org/sen/academics"

[Setup]
; NOTE: The value of AppId uniquely identifies this application.
; Do not use the same AppId value in installers for other applications.
; (To generate a new GUID, click Tools | Generate GUID inside the IDE.)
AppId={{B44DE518-39D2-44E6-AFCD-CF9389C85229}}
AppName={#MyAppName}
AppVersion={#MyAppVersion}
;AppVerName={#MyAppName} {#MyAppVersion}
AppPublisher={#MyAppPublisher}
AppPublisherURL={#MyAppURL}
AppSupportURL={#MyAppURL}
AppUpdatesURL={#MyAppURL}
DefaultDirName="{reg:HKLM\SOFTWARE\Microsoft\Windows\CurrentVersion\Uninstall\WampServer 2_is1,InstallLocation}\www\academics"
DefaultGroupName={#MyAppName}
AllowNoIcons=yes
OutputDir=E:\build
OutputBaseFilename={#MyAppName}-{#MyAppVersion}
Compression=lzma
SolidCompression=yes

[Languages]
Name: "english"; MessagesFile: "compiler:Default.isl"

[Files]
Source: "E:\academics\*"; DestDir: "{reg:HKLM\SOFTWARE\Microsoft\Windows\CurrentVersion\Uninstall\WampServer 2_is1,InstallLocation}\www\academics"; Flags: ignoreversion recursesubdirs createallsubdirs
Source: "E:\academics_v3.sql"; DestDir: "{tmp}"

[Run]
Filename: "{reg:HKLM\SOFTWARE\Microsoft\Windows\CurrentVersion\Uninstall\WampServer 2_is1,InstallLocation}\bin\mysql\mysql5.5.8\bin\mysql.exe"; Parameters: "-u root -e  ""source {tmp}\academics_v3.sql""";

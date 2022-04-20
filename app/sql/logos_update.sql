# freepnglogos.com was detected as malicious by Avast
# So changing it with this sql

update biller_list
set ref="https://cdn.worldvectorlogo.com/logos/spotify-2.svg"
where ref="https://www.freepnglogos.com/uploads/spotify-logo-png/spotify-download-logo-30.png";

update biller_list
set ref="https://cdn-icons-png.flaticon.com/512/906/906361.png"
where ref="https://www.freepnglogos.com/uploads/discord-logo-png/discord-logo-logodownload-download-logotipos-1.png";

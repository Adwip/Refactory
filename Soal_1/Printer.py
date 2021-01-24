import datetime

def set_spasi(content, val, spasi=' '):
    karakter_1 = len(content)
    karakter_2 = len(val)
    isi_content = ''
    isi_content = content+' : '
    empty_length = 30-(karakter_1+karakter_2+2)
    for i in range(empty_length+2):
        if i==0:
            isi_content = content+' :'
        elif i > 0 and i <= empty_length:
            isi_content = isi_content + spasi
        else:
            isi_content = isi_content + val
    return isi_content

#=================================================================

# print(header('Nasi rames'))%x %X
warung = input('Nama warung :')#'Warung Makan Sederhana'
kasir = input('Nama kasir :')
while len(kasir) > 24 :
    print('Nama anda terlalu panjang')
    kasir = input('Nama kasir : ')
tanggal = input('Tanggal : ')
while len(tanggal) > 24 :
    print('Nama anda terlalu panjang')
    kasir = input('Nama kasir : ')

jumlah_menu = input('Jumlah menu : ')
menu = [None] * int(jumlah_menu)
harga = [None] * int(jumlah_menu)
for i in range(int(jumlah_menu)):
    menu[i] = input('Nama menu : ')
    harga[i] = input('Harga menu : ')

total = 0
for j in range(int(jumlah_menu)):
    total = total + int(harga[j])


print('***********************************************************************')
print(' ')

print (warung.center(30))
print(set_spasi('Tanggal',tanggal))
print(set_spasi('Nama',kasir))
print(' ')
for k in range(30):
    print('=',end='')
print(' ')
for l in range(int(jumlah_menu)):
    print(set_spasi(menu[l],harga[l],'.'))
    
print(' ')
print(' ')
print(set_spasi('Total',str(total),'.'))
orden = [15,27,21,17,8,24,12,25,20,18,9,22,4,0,16,5,11,23,10,14,26,19,3,6,7,1,13,2]

b64list = open("./base64", "r").readlines()
base64_final = ""

for x in range(len(orden)):
	index = orden.index(x)
	base64_final += b64list[index].replace("\n","")
print(base64_final)

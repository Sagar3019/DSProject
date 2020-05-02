class imgregc:
	def ftc():
		try:
			import cv2
			import numpy
			face=cv2.CascadeClassifier("D:/project/modl/haarcascade_frontalface_default.xml")
			def dector(img):
			    gray= cv2.cvtColor(img,cv2.COLOR_BGR2GRAY)
			    faces = face.detectMultiScale(gray,1.3,5)
			    for(x,y,w,h) in faces:
			        cv2.rectangle(img,(x,y),(x+w,y+w),(127,0,255),5)
			    return img
			cap = cv2.VideoCapture(0)
			while True:
			    ret,frame =cap.read()
			    cv2.imshow("Face Detection",dector(frame))
			    if cv2.waitKey(1)==13:
			        break
			cap.release()
			cv2.destroyAllWindows() 
		except ImportError:
			print("Error loading Modules for face recognition module !")
		except ValueError:
			print("")
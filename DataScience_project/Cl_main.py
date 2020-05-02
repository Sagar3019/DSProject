class dfconv:
	def __init__(self):
		try:
			self.mainload()
		except EOFError:
			print("\nForce Program Termination !")
			exit()

	def mainload(self):
		while True:
			print("\nWelcome to Data Processing Module : \n")
			self.mode=int(input("Operation to be executed : \n1. Data Cleansing \n2. Data Prediction \n3. Face Recognition \n4. Exit \nChoice : "))
			if self.mode==1:
				self.loader_mod()
			elif self.mode==2:
				self.data_pred()
			elif self.mode==3:
				self.facereg()
			elif self.mode==4:
				exit()
			else:
				try:
					import os
					os.system('cls')
				except ImportError:
					print("Error Loading os module ! Skipping Screen Clear.")
				finally:
					print("Invalid Selection ! Please Try Again")


	def loader_mod(self):
		try :
			import pandas as pd
		except ImportError:
			print("Error Loading pandas Module !")
			print("Critcal Module load failure...exiting!")
			exit()
		try :
			from modl.loader import Loader as ld
			print("\n")
			while True:
				self.ch=int(input("Create DataFrame from :\n1.CSV \n2.Excel \n3.DataBase \nChoice : "))
				if self.ch==1:
					self.path=input("Enter file path : ")
					self.df=ld.csvloader(self.path)
					break
				elif self.ch==2:
					self.path=input("Enter file path : ")
					self.df=ld.exloader(self.path)
					break
				elif self.ch==3:
					try :
						import cx_Oracle as oc
						self.conn = oc.connect("system/sagar@localhost")
						self.tname=input("Enter table name : ")
						self.df=ld.dbloader(self.tname,self.conn)	
						self.conn.close()
						break
					except ImportError:
						print("Error Loading oracle Module !")
				else:
					print("Invalid Choice ! Try Again.")
		except ImportError:
			print("Error Loading Loader Module !")
		except FileNotFoundError:
			print("\nError Loading specified File ! Please Try Again.\n")
			self.loader_mod()

		print("\nLoad Completed : \n ",self.df,"\n")
		print("Begining Cleanning Phase...\n")
		self.dclean()
		print("\nDataFrame after Cleansing : \n")
		print(self.df)

		self.qs=input("Export Cleaned DataFrame ? [Y/N] \nChoice : ")
		print("\n")
		if self.qs=='Y' or self.qs=='y':
			try:
				from modl.expdf import Exptf as exp
				while True :
					self.etype=int(input("Export DataFrame to :\n1.CSV \n2.Excel \n3.DataBase \nChoice : "))
					if self.etype==1:
						exp.ecsv(self.df)
						break
					elif self.etype==2:
						exp.eexl(self.df)
						break
					elif self.etype==3:
						try :
							import cx_Oracle as oc
							self.conn = oc.connect("system/sagar@localhost")
							exp.edb(self.df,self.conn)
							self.conn.close()
						except ImportError:
							print("Error Loading DataBase Module !")
						break
					else:
						print("Invalid Choice ! Try Again.")
				print("\nFile Export Successfull !\n")
			except ImportError:
				print("Error Loading Export Module !")
		else:
		 	pass

	def dclean(self):
		while True:
			self.ctype=int(input("Cleaning Method to be used : \n1. Automatic \n2. Manual \nChoice : "))
			if self.ctype==1:
				try:
					from modl.clean_auto import Cleaner as dc
					self.df=dc.dfcl(self.df,self.ch)
					break
				except ImportError:
					print("Error Loading Auto Clean Module !")
			elif self.ctype==2:
				try:
					import modl.clean_man as dcm
					self.df=dcm.auto_handle(self.df)
					break
				except ImportError:
					print("Error Loading Manual Clean Module !")
			else:
				print("Invalid Choice ! Try Again.")

	def data_pred(self):
		while True :
			print("")
			self.ptype=int(input("Type of prediction to be perform : \n1. Contextual \n2. Graphical \nChoice : "))
			print("\n")
			try:
				if self.ptype==1:
					ds=int(input("DataSet to be used for prediction : \n1. Iris DataSet \nComing Soon... \nChoice :"))
					if ds==1:
						from modl.predcl import Iris as ip
						ip.iris_class_pred()
						break
					else:
						print ("Invalid Choice ! Try Again")
				elif self.ptype==2:
					ds=int(input("DataSet to be used for prediction : \n1. Salary&Experince DataSet \nComing Soon... \nChoice :"))
					if ds==1:
						from modl.predgl import Salpred as sp
						sp.sal_exp_pred()
						break
					else:
						print ("Invalid Choice ! Try Again")
				else:
					print("Invalid Choice ! Try Again.")
			except ImportError:
				print("Error loading prediction module !")
				break

	def facereg(self):
		while True :
			print("")
			self.rtype=int(input("Detect Face From : \n1. Image \n2. Through Camera \nChoice : "))
			try:
				if self.rtype==1:
					from modl.frti import imgreg as ir
					ir.finimg()
					break
				if self.rtype==2:
					from modl.frtc import imgregc as irc
					irc.ftc()
					break
			except ImportError:
				print("Error loading Face Recognition module !")
mobj=dfconv()
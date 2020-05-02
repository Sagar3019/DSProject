class Exptf:
	def ecsv(df):
		name=input("\nExport File Name : ")
		name+=".csv"
		df.to_csv(name,index=True)
	def eexl(df):
		name=input("\nExport File Name : ")
		name+=".xlsx"
		df.to_excel(name,sheet_name="sheet 1",index=True)
	def edb(df,conn):
		name=input("\nExport Table Name : ")
		df.to_sql(name,conn,index=True,if_exits='replace')

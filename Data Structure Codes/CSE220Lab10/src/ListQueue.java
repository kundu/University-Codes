public class ListQueue 
{
	public Patient head;
	public Patient newhead;
	public Patient tail;
	public Patient newtail;
	public int size=0;
	
	public void RegisterPatient(String s)
	{
		if(head==null)
		{
			Patient p=new Patient(s, null);
			head=p;
			tail=p;
			size++;
		}
		else
		{
			Patient p=new Patient(s, null);
			tail.next=p;
			tail=p;
			size++;
		}
	}
	
	public String ServePatient()
	{
		if(CanDoctorGoHome())
			return "No Pateint is there";
		else
		{
			String save=head.name;
			head=head.next;
			size--;
			return save;
		}
	}
	
	public boolean CanDoctorGoHome()
	{
		if(size==0)
			return true;
		else
			return false;
	}
	Object temp;
	public void ShowAllPatient()
	{
		Object copy[]=new Object[size];
		int v=0;
		for(Patient p=head;p!=null;p=p.next)
		{
			copy[v]=p.name;
			v++;
		}
		
		for (int c = 0; c < size; c++) 
		{
			for (int i = c+1; i < size; i++) 
			{
				if(((String) copy[c]).compareTo((String) copy[i])>-1)
				{
					temp=copy[c];
					copy[c]=copy[i];
					copy[i]=temp;
				}
			}
		}
		
		for(int c=0;c<size;c++)
		{
			System.out.println(copy[c]);
		}
		
	}
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

}

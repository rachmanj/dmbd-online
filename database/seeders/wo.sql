/* SELECT * FROM OSCL T0 */
-- Declare @Project AS NVARCHAR(8)
-- SET @Project = /* T0.U_MIS_Project  */ '[%0]'
SELECT 
T0.U_MIS_Project [project],
(SELECT Top 1 CASE T8.U_MIS_PlantGroup 
WHEN 'A' THEN 'A'
 WHEN 'B' THEN 'B'
 WHEN 'C' THEN 'C'
END FROM OITM T8 WHERE  T0.U_MIS_UnitNo=T8.U_MIS_UnitNo ORDER BY T8.U_MIS_PlantGroup Desc)[plant_group],
(SELECT Top 1 T8.U_MIS_UType FROM OITM T8 WHERE  T0.U_MIS_UnitNo=T8.U_MIS_UnitNo ORDER BY T8.U_MIS_UType  Desc)[unit_type],
T0.U_MIS_UnitNo [unit_code], 
T0.U_MIS_ModeNo [unit_model],
CASE T0.[status] WHEN '-1' THEN 'Closed' WHEN '-3' THEN 'Open' END [wo_status],
CASE T0.U_MIS_StatPos  
WHEN 'BD' THEN 'Breakdown' 
WHEN 'AJ' THEN 'Additional Job'
END [status_position],
T0.U_MIS_HoursMeter [hour_meter],
(SELECT Top 1 a.U_MIS_ActCode FROM OCLG a WHERE T0.CallId = a.parentId ORDER BY a.endDate desc, a.ENDTime Desc) [activity_code],
T0.U_MIS_MalStartDt [malfunction_date],
T0.U_MIS_MalStartTm [malfunction_time],
CASE T0.[status] 
WHEN '-1' THEN Convert(varchar(10),DATEDIFF(day,T0.U_MIS_MalStartDt,T0.[updateDate]))
WHEN '-3' THEN Convert(varchar(10),DATEDIFF(dd,T0.U_MIS_MalStartDt,GETDATE()))END[days_of_breakdown],
T0.subject [notification_description],
CASE T0.U_MIS_JobCtg 
	WHEN 'A' THEN 'Schedule'
	WHEN 'B' THEN 'Unschedule'
	WHEN 'C' THEN 'Accident'
	WHEN 'D' THEN 'Additional Job'
	WHEN 'E' THEN 'Unit Rental'
END [job_category],
T0.DocNum [wo_no],
T0.callID [call_id],
T0.U_MIS_LastOpUse [last_operator_id],
T0.U_MIS_WODate [wo_date],
T1.DocNum [mr_no],
T1.DocDate [mr_date],
CASE T1.DocStatus WHEN 'O' THEN 'Open' WHEN 'C' THEN 'Closed' END [mr_status],
(SELECT TOP 1 M0.DocNum From ODLN M0 JOIN DLN1 M1 ON M0.DocEntry = M1.DocEntry WHERE M1.BaseEntry = T1.docentry ORDER BY M0.DocEntry) [first_mi_no],
(SELECT TOP 1 M0.DocDate From ODLN M0 JOIN DLN1 M1 ON M0.DocEntry = M1.DocEntry WHERE M1.BaseEntry = T1.docentry ORDER BY M0.DocEntry) [first_mi_date],
(SELECT TOP 1 M0.DocNum From ODLN M0 JOIN DLN1 M1 ON M0.DocEntry = M1.DocEntry WHERE M1.BaseEntry = T1.docentry ORDER BY M0.DocEntry Desc) [last_mi_no],
(SELECT TOP 1 M0.DocDate From ODLN M0 JOIN DLN1 M1 ON M0.DocEntry = M1.DocEntry WHERE M1.BaseEntry = T1.docentry ORDER BY M0.DocEntry Desc) [last_mi_date],
T3.DocNum[pr_no],
T3.DocDate [pr_date],
T2.DocNum [po_no],
T2.DocDate [po_date],
CASE T2.DocStatus 
WHEN 'O' Then 'Open' 
When 'C' Then CASE T2.Canceled WHEN 'Y' THEN 'Cancelled' ELSE 'Closed' END Else T2.DocStatus End 
AS [po_status],
T2.U_MIS_DocRefNo [po_rev_no],
T2.U_MIS_EstArrival [eta_date],
CASE T2.U_ARK_DelivStat WHEN 'Y' THEN 'Delivered' WHEN 'N' THEN 'Not Delivered' END [delivery_status],
T2.U_MIS_DeliveryTime [delivery_date],
T6.DocNum [grpo_no],
T6.DocDate [grpo_date],
T4.DocNum [ito_no],
T4.DocDate [ito_date],
T5.DocNum [iti_no],
T5.DocDate [iti_date],
T0.U_MIS_EndWkDt [finish_date],
T0.U_MIS_EndWkTm [finish_time],
(SELECT Top 1 a.EndDate FROM OCLG a WHERE T0.CallId = a.parentId ORDER BY a.endDate desc, a.ENDTime Desc) [last_activity_date],
(SELECT Top 1 a.Details FROM OCLG a WHERE T0.CallId = a.parentId ORDER BY a.endDate desc, a.ENDTime Desc) [activity_text],
T0.descrption [remarks]
FROM OSCL T0
LEFT JOIN ORDR T1 ON T0.DocNum = T1.U_MIS_WoNo
LEFT JOIN OPRQ T3 ON T1.DocNum = T3.U_MIS_MRNo 
LEFT JOIN OPOR T2 ON T3.DocNum = T2.U_MIS_PRNo
LEFT JOIN PDN1 T7 ON T2.DocEntry=T7.BaseEntry
LEFT JOIN OPDN T6 ON T6.DocEntry = T7.Docentry 
LEFT JOIN OWTR T4 ON T6.DocNum=T4.U_MIS_GRPONo 
LEFT JOIN OWTR T5 ON T4.DocNum = T5.U_MIS_DocRefNo


WHERE T0.status = '-3' 
-- AND T0.U_MIS_Project = @Project

UNION ALL 

SELECT 
T0.U_MIS_Project [Project],
(SELECT Top 1 CASE T8.U_MIS_PlantGroup 
WHEN 'A' THEN 'A'
 WHEN 'B' THEN 'B'
 WHEN 'C' THEN 'C'
END FROM OITM T8 WHERE  T0.U_MIS_UnitNo=T8.U_MIS_UnitNo ORDER BY T8.U_MIS_PlantGroup Desc)[Plant Group],
(SELECT Top 1 T8.U_MIS_UType FROM OITM T8 WHERE  T0.U_MIS_UnitNo=T8.U_MIS_UnitNo ORDER BY T8.U_MIS_UType  Desc)[Unit Type],
T0.U_MIS_UnitNo [Unit Code], 
T0.U_MIS_ModeNo [Unit Model],
CASE T0.[status] WHEN '-1' THEN 'Closed' WHEN '-3' THEN 'Open' END [WO Status],
CASE T0.U_MIS_StatPos  
WHEN 'BD' THEN 'Breakdown' 
WHEN 'AJ' THEN 'Additional Job'
END [Status Position],
T0.U_MIS_HoursMeter [Hour Meter],
(SELECT Top 1 a.U_MIS_ActCode FROM OCLG a WHERE T0.CallId = a.parentId ORDER BY a.endDate desc, a.ENDTime Desc) [Activity Code],
T0.U_MIS_MalStartDt [Malfunction Date],
T0.U_MIS_MalStartTm [Malfunction Time],
CASE T0.[status] 
WHEN '-1' THEN Convert(varchar(10),DATEDIFF(day,T0.U_MIS_MalStartDt,T0.[updateDate]))
WHEN '-3' THEN Convert(varchar(10),DATEDIFF(dd,T0.U_MIS_MalStartDt,GETDATE()))END[Breakdown As of Today],
T0.subject [Notification Description],
CASE T0.U_MIS_JobCtg 
	WHEN 'A' THEN 'Schedule'
	WHEN 'B' THEN 'Unschedule'
	WHEN 'C' THEN 'Accident'
	WHEN 'D' THEN 'Additional Job'
	WHEN 'E' THEN 'Unit Rental'
END [Job Category],
T0.DocNum [WO No],
T0.callID,
T0.U_MIS_LastOpUse,
T0.U_MIS_WODate [WO Date],
T1.DocNum [MR No],
T1.DocDate [MR Date],
CASE T1.DocStatus WHEN 'O' THEN 'Open' WHEN 'C' THEN 'Closed' END [MR Status],
(SELECT TOP 1 M0.DocNum From ODLN M0 JOIN DLN1 M1 ON M0.DocEntry = M1.DocEntry WHERE M1.BaseEntry = T1.docentry ORDER BY M0.DocEntry) [First Material Issue No],
(SELECT TOP 1 M0.DocDate From ODLN M0 JOIN DLN1 M1 ON M0.DocEntry = M1.DocEntry WHERE M1.BaseEntry = T1.docentry ORDER BY M0.DocEntry) [First Material Issue Date],
(SELECT TOP 1 M0.DocNum From ODLN M0 JOIN DLN1 M1 ON M0.DocEntry = M1.DocEntry WHERE M1.BaseEntry = T1.docentry ORDER BY M0.DocEntry Desc) [Last Material Issue No],
(SELECT TOP 1 M0.DocDate From ODLN M0 JOIN DLN1 M1 ON M0.DocEntry = M1.DocEntry WHERE M1.BaseEntry = T1.docentry ORDER BY M0.DocEntry Desc) [Last Material Issue Date],
T3.DocEntry[PR No],
T3.DocDate [PR Date],
T2.DocNum [PO No],
T2.DocDate [PO Date],
CASE T2.DocStatus 
WHEN 'O' Then 'Open' 
When 'C' Then CASE T2.Canceled WHEN 'Y' THEN 'Cancelled' ELSE 'Closed' END Else T2.DocStatus End 
AS [PO Status],
NULL,
T2.U_MIS_EstArrival [Estimated Arrival],
CASE T2.U_ARK_DelivStat WHEN 'Y' THEN 'Delivered' WHEN 'N' THEN 'Not Delivered' END [Delivery Status],
T2.U_MIS_DeliveryTime [Delivery Time],
NULL,
NULL,
''[ITO No],
NULL,
''[ITI No],
NULL,
T0.U_MIS_EndWkDt [Finish Date],
T0.U_MIS_EndWkTm [Finish Time],
(SELECT Top 1 a.EndDate FROM OCLG a WHERE T0.CallId = a.parentId ORDER BY a.endDate desc, a.ENDTime Desc) [Last Activity Date],
(SELECT Top 1 a.Details FROM OCLG a WHERE T0.CallId = a.parentId ORDER BY a.endDate desc, a.ENDTime Desc) [Activity Text],
T0.descrption [Remarks]
FROM OSCL T0
LEFT JOIN ORDR T1 ON T0.DocNum = T1.U_MIS_WoNo
LEFT JOIN ODRF T3 ON T1.DocNum = T3.U_MIS_MRNo 
LEFT JOIN OPOR T2 ON T3.DocEntry= T2.U_MIS_PRNo
WHERE T0.status = '-3' 
AND T3.ObjType ='1470000113' AND T3.DocStatus='O'
-- AND T0.U_MIS_Project = @Project